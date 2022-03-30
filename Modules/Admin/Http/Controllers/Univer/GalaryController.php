<?php

namespace Modules\Admin\Http\Controllers\Univer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use View;

use App\Services\UploadPhoto;
use Modules\Entity\Model\University\University as Model;
use Modules\Entity\Model\University\UniversityGalary;


class GalaryController extends Controller {
    protected $def_model = Model::class;
    protected $action_create = ModelCreateAction::class;
    protected $action_delete = ModelDeleteAction::class;

    public function __construct(Request $request) {
        View::share ('route_path', 'admin_uni');
        View::share ('request', $request);
    }

    function index(Request $request, Model $item){
        return view('admin::page.univer.galary.index', [
            'title' => 'Галерея',
            'model' => $item,
            'items' => $item->relGalary()->latest()->get()
        ]);
    }

    function save(Request $request, Model $item){
        $ar = [];
        $ar['university_id'] = $item->id;

        if ($request->has('photo'))
            $ar['photo'] = UploadPhoto::upload($request->photo);
        else 
            unset($ar['photo']);

        $ar['note'] = json_encode([
            'ru' => $request->note['ru'],
            'en' => $request->note['en']
        ]);

        UniversityGalary::create($ar);

        return redirect()->back()->with('success', trans('main.created_model'));
    }

    function delete(Request $request, Model $item, UniversityGalary $galary){
        $galary->delete();
        
        return redirect()->back()->with('success', trans('main.deleted_model'));
    }
}

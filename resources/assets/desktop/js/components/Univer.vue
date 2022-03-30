<template>
    <div class="form-group"></div>
</template>

<script>
export default {
    //props: ["lang", "rank_unikum", "group"],
    mounted() {
        this.pp();

        console.log("Component mounted.");
    },
    methods: {
        pp() {
            $(".need_validate_form").on("submit", function(e) {
                var data = $(this).serializeArray();

                data.push({ name: "ajax", value: "ajax" });
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    data: data
                }).then(function(data) {
                    // var data = JSON.parse(data);
                    console.log(data);
                    return false;
                    if (data.content == "ok") {
                        return true;
                    } else {
                        console.log(data.content);
                        //alert(data.content.rank_unikum[0]);
                        var message = data.content.rank_unikum[0];
                        console.log(data.content);
                        e.preventDefault();
                        for (date in data.content) {
                            $("#" + date).attr("data-message2", message);

                            //alert(data.content[date][0])
                        }
                    }
                });

                e.preventDefault();
            });
        }
    }
};
</script>

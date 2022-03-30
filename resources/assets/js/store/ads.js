
class Ad {
  constructor (title, description, ownerId, imageSrc = '', promo = false, id = null) {
    this.title = title
    this.description = description
    this.ownerId = ownerId
    this.imageSrc = imageSrc
    this.promo = promo
    this.id = id
  }
}

export default {
  state: {
    ads: [],
	test:'',
  },
  mutations: {
     changetest(state, payload) {
      state.test = payload
	 }
  },
  actions: {
    

  },
  getters: {
    viewtest(state){
		return state.test;
	}
  }
}

<template>
  <div class="p-5">
    <div class="card-body w-3">
      <div>Я - {{ thisUser.name }}</div>
      <input type="text" class="form-control w-25" v-model="thisUser.name" />
      <div>surname - {{ thisUser.surname }}</div>
      <input v-model="thisUser.surname" type="text" class="form-control w-25" />
      <div>city - {{ thisUser.city }}</div>
      <input v-model="thisUser.city" type="text" class="form-control w-25" />
    </div>
    <br />
    <div>Контакты</div>
    <div
      class="row"
      v-for="(phone, index) in thisUser.pthones"
      v-bind:key="index"
    >
      <div class="">
        <div class="d-flex">
          <input
            v-model="phone.name"
            type="text"
            class="form-control w-25"
            placeholder="Название"
          />
          <input
            v-model="phone.number"
            type="text"
            class="form-control w-25"
            placeholder="Телефон"
          />
          <div class="input-group">
            <div class="input-group-prepend">
              <button
                type="button"
                class="btn btn-outline-danger"
                @click="delPhone(index)"
              >
                -
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 h-1">
        <button type="button" class="btn btn-primary" @click="addPhone">
          +
        </button>
      </div>
    </div>
    <br />
    <div class="">
      <input
        @click.prevent="sendData()"
        type="submit"
        value="Изменить"
        class="btn btn-primary"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    dataupdate: String,
  },
  data() {
    return {
      thisUser: this.user,
      downloads: [],
      fileProgress: 0,
      fileCurrent: "",
    };
  },
  mounted() {
    this.sendData, console.log("Component mounted.");
  },
  methods: {
    addPhone() {
      if (this.thisUser.pthones == null) {
        this.thisUser.pthones = [{ name: "", number: "" }];
      } else {
        this.thisUser.pthones.push({ name: "", number: "" });
      }
    },
    delPhone(item){
      console.log(item)
      this.thisUser.pthones.splice(item,1)
    },
    sendData() {
      axios
        .get(this.dataupdate, { params: { user: this.thisUser } })
        .then((response) => {
          // this.thisUser = response.data;
          console.log(response.data);
        });
    },
    
  },
};
</script>
<template>
  <section
    class="bg-[#4C4556] flex h-20 justify-center lg:justify-between md:justify-between w-full"
  >
    <router-link to="/" class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:ml-3 lg:mr-0">
      <img
        src="/src/assets/images/vipapanna1.svg"
        alt=""
        class="cursor-pointer"
      />
    </router-link>
    <Searchbar />
  </section>
  <section style="font-family: 'Cabin', sans-serif">
    <div
      :style="{ backgroundImage: `url(${selectedCard.image})` }"
      class="text-white bg-cover bg-center"
    >
      <router-link to="/">
        <img class="h-[3rem] ml-3" src="/src/assets/images/back.png" alt="" />
      </router-link>
      <div class="flex flex-col pl-10 pt-14 pb-20">
        <h1 class="text-6xl">{{ selectedCard.title }}</h1>
        <h2 class="text-2xl">RATING: {{ selectedCard.rating }}/5</h2>
        <h2 class="text-xl break-normal">{{ selectedCard.address }}</h2>
      </div>
    </div>

    <div
      class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 mt-10 lg:mx-20 items-center"
    >
      <FoodCard
        @click="openModal(food.food_name, food.food_image_link)"
        class="m-auto cursor-pointer"
        v-for="food in menu"
        :key="food.id"
        :FoodName="food.food_name"
        :FoodImageLink="food.food_image_link"
      />

      <Dialog
        v-model:visible="visible"
        modal
        :header="modalName"
        :style="{ width: '50vw' }"
      >
        <img :src="modalImage" alt="" />
      </Dialog>
    </div>
  </section>

  <Footer />
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
import axios from "axios";
import FoodCard from "./FoodCard.vue";
import Dialog from "primevue/dialog";
import { isPromise } from "@vue/shared";
import Backbtn from "./Backbtn.vue";

export default {
  components: { Searchbar, Footer, FoodCard, Dialog, Backbtn },

  computed: {
    selectedCard() {
      return this.$store.state.selectedCard;
    },
  },
  methods: {
    openModal(Name, Image) {
      this.modalName = Name;
      this.modalImage = Image;
      this.visible = true;
    },
  },
  mounted() {
    window.scroll(0, 0);

    if (this.selectedCard && this.selectedCard.id) {
      axios
        .get(
          `https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/food/${this.selectedCard.id}`
        )
        .then((response) => {
          console.log(response)
          const menu = response.data.data.map((item) => ({
            food_name: item.food_name,
            food_image_link: item.food_image_link,
            food_info: item.description,
          }));
          this.menu = menu;
        })
        .catch((error) => {
          console.error(error);
        });
    }
  },
  data() {
    return {
      menu: [],
      visible: false,
      modalName: "",
      modalImage: "",
    };
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>

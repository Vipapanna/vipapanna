<template>
  <section>
    <section class="bg-[#4C4556] flex h-auto w-full">
      <router-link
        to="/"
        class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:ml-3 lg:mr-0 absolute"
      >
        <img
          src="/src/assets/images/vipapanna1.svg"
          alt=""
          class="cursor-pointer mt-2"
        />
      </router-link>
      <Searchbar class="my-4" />
    </section>
    </section>

  <section style="font-family: 'Cabin', sans-serif">
    <div
      :style="{
        backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${selectedCard.image})`,
      }"
      class="text-white bg-cover bg-center"
    >
      <div class="inset-0 bg-black bg-opacity-40">
        <router-link to="/">
          <img class="h-[3rem] ml-3 contents" :src="placeholder" alt="" />
        </router-link>
        <div class="flex flex-col pl-10 pt-14 pb-20">
          <h1 class="text-6xl">{{ selectedCard.title }}</h1>
          <h2 class="text-2xl">RATING: {{ selectedCard.rating }}/5</h2>
          <div class="flex flex-row ml-3 mb-2">
            <img
              v-for="index in selectedCard.rating"
              :key="index"
              src="/src/assets/images/rating-star.svg"
              alt=""
            />
          </div>
          <h2 class="text-xl break-normal">{{ selectedCard.address }}</h2>
        </div>
      </div>
    </div>
    <div
      class="grid grid-cols-1 lg:grid-cols-2 lg:gap-4 mt-10 lg:mx-20 items-center"
    >


<!-- MAXIM TOTO DOROB (SKELETON LOADER)-->

  <div v-if="foodLoading">
    <div v-for="index in 20" :key="index">
    <div role="status" class="flex flex-row border-gray-300 border-2 items-center lg:w-[41rem] rounded-xl">
      <div class="flex items-center justify-center mb-4 bg-gray-300 dark:bg-gray-700 ml-auto h-[7rem] lg:h-[9rem] m-2 rounded-2xl">
      </div>
      <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4 mx-auto ml-4"></div>
      <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4 mx-auto ml-4"></div>
    <span class="sr-only">Loading...</span>
    <div class="items-center flex mb-8 lg:w-[40rem] mx-2">
    </div>
  </div>
</div>
</div>

    <FoodCard
      @click="openModal(food.food_name, food.food_image_link, food.link_bistro, food.price_bistro, food.link_wolt, food.price_wolt)"
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
      />
      <FoodCard
        @click="
          openModal(
            food.food_name,
            food.food_image_link,
            food.link_bistro,
            food.price_bistro,
            food.link_wolt,
            food.price_wolt
          )
        "
        class="m-auto cursor-pointer"
        v-for="food in menu"
        :key="food.id"
        :FoodName="food.food_name"
        :FoodImageLink="food.food_image_link"
      />

      <Dialog v-model:visible="visible" modal :style="{ width: '50vw' }">
        <img :src="modalImage" alt="" />
        <p>Zložte si Vaše McMenu so sendvičom Big Mac, hranolkami alebo záhradným šalátom so zálievkou a veľkým nápojom. Alergény sú uvedené pri jednotlivých produktoch v ponuke.</p>
        <div class="flex flex-row justify-between text-xl mt-6 text-blue-400">
          <a :href="link_w" class="underline">Wolt</a>
          <p>{{ price_w }} €</p>
        </div>

        <div class="flex flex-row justify-between text-2xl mt-4 text-white">
          <div class="flex flex-row">
            <a
              :href="link_b"
              class="underline bg-orange-400 p-1 px-2 rounded-lg"
              >Bistro</a
            >
          </div>
          <p class="text-orange-400">{{ price_b }} €</p>
        </div>
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
import Backbtn from "./Backbtn.vue";

export default {
  components: { Searchbar, Footer, FoodCard, Dialog, Backbtn },

  computed: {
    selectedCard() {
      return this.$store.state.selectedCard;
    },
    placeholder() {
      return new URL("/src/assets/images/big-mac.jpeg", import.meta.url).href;
    },
  },
  methods: {
    openModal(Name, Image, link_bistro, price_bistro, link_wolt, price_wolt) {
      this.modalName = Name;
      this.modalImage = Image;
      this.link_b = link_bistro;
      this.price_b = price_bistro;
      this.link_w = link_wolt;
      this.price_w = price_wolt;
      this.visible = true;
    },
  },
  mounted() {
    window.scroll(0, 0);
    console.log(this.selectedCard);

    if (this.selectedCard && this.selectedCard.id) {
      axios
        .get(
          `https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/food/${this.selectedCard.id}`
        )
        .then((response) => {
          this.foodLoading = false
          console.log(response);
          const menu = response.data.data.map((item) => ({
            food_name: item.food_name,
            food_image_link: item.food_image_link,
            food_info: item.description,
            link_bistro: item.link_bistro,
            price_bistro: item.price_bistro,
            link_wolt: item.link_wolt,
            price_wolt: item.price_wolt,
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
      link_b:"",
      price_b:"",
      link_w:"",
      price_w:"",
      foodLoading:"true",
    };
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>

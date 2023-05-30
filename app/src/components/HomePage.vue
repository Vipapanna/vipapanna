<template>
    <div v-if="isLoading" class="fixed inset-0 flex items-center justify-center bg-black z-50">
      <div class="text-white">Loading...</div>
    </div>
  <section id="mainpage">
    <section
      class="bg-[#4C4556] flex h-20 justify-center lg:justify-between md:justify-between w-full"
    >
      <Searchbar />

      <div class="h-auto w-auto hidden sm:flex md:flex lg:flex lg:">
        <img
          @click="reload"
          src="/src/assets/images/vipapanna1.svg"
          alt=""
          class="mr-6 cursor-pointer"
        />
      </div>
    </section>

    <!--
      <button
        class="w-20 h-11 rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90 cursor-pointer lg:w-24 lg:h-12"
        @click="popup"
      >
        Log In
      </button>

    </section>

    <section
      class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center z-50"
      id="overlay"
    >
      <div
        class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center absolute"
        id="loginp"
      >
        <Backbtn 
        class="cursor-pointer" 
        @click="close"
        />

        <input
          type="email"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="example@gmail.com"
          name=""
          id="email1"
        />
        <input
          type="password"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="Heslo"
          name=""
          id="pword1"
        />
  
        <div class="space-x-24 mb-9">
          
          <button
            class="bg-transparent text-[0.8rem] text-blue-500"
            @click="register"
            id="create-account"
          >
            Vytvorit ucet
          </button>
          
          <button
            class="bg-transparent text-[0.8rem] text-blue-500"
            @click="forgotpasword"
            id="forgotten-password"
          >
            Zabudnute heslo
          </button>

        </div>
  
        <button
          class="rounded-xl bg-gray-400 bg-opacity-20 w-28 h-9 hover:opacity-80"
        >
          Log In
        </button>
      </div>
  
      <div
        class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center hidden pb-10"
        id="regpage"
      >
        <Backbtn 
        class="cursor-pointer mt-12"
        @click="regclose"
        />
  
        <input
          type="email"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="example@gmail.com"
          name=""
        />
        <input
          type="password"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="Heslo"
          name=""
        />
        <input
          type="password"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="znova zadanie Heslo"
          name=""
          id="p1"
        />
  
        <button
            class="rounded-xl bg-gray-400 bg-opacity-20 w-28 h-9 hover:opacity-80 mt-5"
        >
          Registracia
        </button>
        
      </div>
  
      <div
        class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center hidden"
        id="resetpasswordpage"
      >
        <Backbtn id="back-btn" 
        class="cursor-pointer"
        @click="forgotclose"/>
  
        <h1 class="mb-14 text-center">
          Na zadanú emailovu adresu vám bude <br />
          zaslaný link na obnovu vašeho hesla
        </h1>
        <input
          type="email"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="example@gmail.com"
          name=""
          id="e1"
        />
  
        <button
        class="rounded-xl bg-gray-400 bg-opacity-20 w-32 h-10 hover:opacity-80 mt-10"
        >
        poslať
      </button>
    </div>
  -->

    <section class="w-full overflow-auto">
      <section>
        <div
          class="flex whitespace-nowrap overflow-auto scrollbar-hide"
          ref="container"
        >
          <img
            v-for="featured in featured"
            @click="selectCard(featured)"
            :key="featured"
            :src="featured.image"
            class="lg:h-96 h-56 self-center rounded-lg m-4"
            alt=""
          />
          <h1>{{ featured.title }}</h1>
        </div>

        <button
          class="opacity-40 lg:absolute lg:top-64 lg:left-8 px-4 py-2 h-12 w-12 first-letter: bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 z-1"
          @click="scroll(-600)"
        >
          «
        </button>
        <button
          class="opacity-40 lg:absolute lg:top-64 lg:right-8 px-4 py-2 h-12 w-12 bg-gray-200 text-gray-700 font-semibold rounded-full mt-4"
          @click="scroll(600)"
        >
          »
        </button>
      </section>

      <section class="my-14">
        <div class="flex items-center justify-center flex-col mb-8">
          <div class="flex flex-row justify-center items-center">
            <p>lokacias</p>
            <div @click="showLocation = !showLocation" class="cursor-pointer">
              <img
                class="h-12"
                src="/src/assets/images/map-marker.svg"
                alt=""
              />
            </div>
          </div>
          <div v-if="showLocation">
            <location />
          </div>
        </div>

        <section class="grid lg:grid-cols-4 md:grid-cols-3 gap-8 lg:mx-1">
          <Card
            class="m-auto cursor-pointer"
            @click="selectCard(card)"
            v-for="card in cards"
            :key="card"
            :title="card.title"
            :image="card.image"
            :rating="card.rating"
            :star="card.star"
          />
        </section>
      </section>
    </section>

    <Footer />
  </section>
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
import Backbtn from "./Backbtn.vue";
import Card from "./Card.vue";
import Location from "./location.vue";

export default {
  components: { Searchbar, Backbtn, Card, Location, Footer },

  computed: {
    cards() {
      return this.$store.state.cards;
    },
    featured() {
      return this.$store.state.featured;
    },
  },
  async mounted() {
    await this.$store.dispatch("fetchCards")
      .then(() => {
        this.isLoading = false;
      })
      .catch((error) => {
        console.error("Error fetching cards:", error);
      })
  },
  methods: {
    scroll(amount) {
      this.$refs.container.scrollBy({
        left: amount,
        behavior: "smooth",
      });
    },
    reload() {
      window.location.reload();
    },
    selectCard(card) {
      this.$store.commit("setSelectedCard", card);
      this.$router.push({ name: "RestaurantPage" });
    },
  },

  data() {
    return {
      showLocation: false,
      isLoading: true,
    };
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Cabin&display=swap");
</style>

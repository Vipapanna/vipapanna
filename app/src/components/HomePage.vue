<template>
  <section
  id="mainpage">
    <section class="bg-[#4C4556] flex h-20 justify-between">  
      <object
        data="./src/assets/images/vipapanna1.svg"
        type="image/svg+xml"
        class="m-4"
      ></object>


      <Searchbar/>

      <button
        class="w-24 h-12 rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90 cursor-pointer"
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
        class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center absolute hidden"
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
          id="e1"
        />
        <input
          type="password"
          class="h-8 rounded-3xl self-center bg-gray-400 bg-opacity-20 drop-shadow-md w-[18rem] m-2 text-center"
          placeholder="Heslo"
          name=""
          id="p1"
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
    </section>

  <section class="w-full overflow-auto">
    <div class="flex whitespace-nowrap overflow-auto scrollbar-hide" ref="container">
      <img
      src="/src/assets/images/banner1.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
      />
      <img
        src="/src/assets/images/banner2.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
        />
        <img
        src="/src/assets/images/banner3.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
        />
        <img
        src="/src/assets/images/banner4.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
        />
        <img
      src="/src/assets/images/banner1.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
      />
      <img
      src="/src/assets/images/banner1.jpeg"
        class="h-96 rounded-lg m-4"
        alt=""
      />
    </div>
      <button class="opacity-40 absolute top-64 left-8 px-4 py-2 h-12 w-12 first-letter: bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 " @click="scroll(-600)"> « </button>
      <button class="opacity-40 absolute top-64 right-8 px-4 py-2 h-12 w-12 bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 " @click="scroll(600)"> » </button>
    </section>
      
      <section class="grid grid-cols-4 gap-0 mx-16">
     
      <Card v-for="card in cards" :key="card" :title="card.title" :image="card.image" :rating="card.rating"/>
  
    </section>
  
  </section>
  </template>
  
  <script>
  
  
  import Searchbar from "./Searchbar.vue";
  import Backbtn from "./Backbtn.vue";
  import Card from "./Card.vue";
  
  export default {
    
    components: { Searchbar, Backbtn, Card },


  methods: {
    scroll: function (amount) {
      this.$refs.container.scrollBy({
        left: amount,
        behavior: "smooth",
      });
    },
  },


    data(){
      return {

        cards: [ 
        {
          title: "McDonalds",
          image: 'https://imageproxy.wolt.com/venue/5e7380c5908a43f00c9e29dd/9e629e20-4437-11eb-b6ee-d6ad5cf43059_mcd_hero_photo_1010x544px.jpg?w=200',
          rating: 5
        },
        ],
 

          popup() {
          overlay.classList.remove("hidden");
          overlay.classList.add("flex");
          loginp.classList.remove("hidden");
          loginp.classList.add("flex");
        },
        register() {
          loginp.classList.add("hidden");
          regpage.classList.remove("hidden");
          regpage.classList.add("flex");
        },
        forgotpasword(){
          loginp.classList.add("hidden");
          loginp.classList.remove("flex");
          resetpasswordpage.classList.remove("hidden");
          resetpasswordpage.classList.add("flex");
        },
        close() {
          overlay.classList.remove("flex");
          overlay.classList.add("hidden");
          loginp.classList.add("hidden");
          loginp.classList.remove("flex");
        },
        regclose() {
          overlay.classList.remove("flex");
          overlay.classList.add("hidden");
          regpage.classList.add("hidden");
          regpage.classList.remove("flex");
        },
        forgotclose(){
          overlay.classList.remove("flex");
          overlay.classList.add("hidden");
          resetpasswordpage.classList.add("hidden");
          resetpasswordpage.classList.remove("flex");
        },
      }
    }
  }
  </script>
  
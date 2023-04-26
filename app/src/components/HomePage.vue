<template>
  <section class="bg-[#4C4556] flex justify-end h-20">
    <object
      data="./src/assets/images/vipapanna1.svg"
      type="image/svg+xml"
      class="m-4 mr-[25rem]"
    >
      logo
    </object>
    <Searchbar />

    <button
      id="login"
      class="w-24 h-12 tex rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90"
    >
      Log-In
    </button>
  </section>

  <section
    class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center z-50 overflow-hidden"
    id="overlay"
  >
    <!--navbar -->

    <!-- log in popup -->

    <div
      class="bg-white rounded-2xl flex flex-col w-[24rem] h-[28rem] justify-center items-center"
      id="login-page"
    >
      <Backbtn id="back-btn" class="mt-4" />

      <div class="mb-9 flex flex-col items-center justify-center">
        

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

        <div class=" flex  justify-between w-full ">
          <button
            class="bg-transparent text-[0.8rem] text-blue-500"
            id="create-account"
          >
            Vytvorit ucet
          </button>

          <button
            class="bg-transparent text-[0.8rem] text-blue-500"
            id="forgotten-password"
          >
            Zabudnute Heslo
          </button>
          </div>
          <button
        class="rounded-xl bg-gray-400 bg-opacity-20 w-32 h-10 hover:opacity-80 mt-10"
        id=""
      >
        Login
      </button>
          </div>
          </div>
          

      <div
        class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center hidden"
        id="register-page"
      >
        
      <Backbtn id="back-btn" />

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
<<<<<<< Updated upstream

      <button
        class="rounded-xl bg-gray-400 bg-opacity-20 w-32 h-10 hover:opacity-80 mt-10"
      >
        Registracia
      </button>
    </div>

    <div
      class="bg-white rounded-2xl flex-col w-[24rem] h-[28rem] justify-center items-center hidden"
      id="reset-password-page"
    >
      <Backbtn id="back-btn" />
=======
    </div>
      <button class="opacity-40 absolute top-64 left-8 px-4 py-2 h-12 w-12 first-letter: bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 " @click="scroll(-600)"> « </button>
      <button class="opacity-40 absolute top-64 right-8 px-4 py-2 h-12 w-12 bg-gray-200 text-gray-700 font-semibold rounded-full mt-4 " @click="scroll(600)"> » </button>
    </section>
      
      <section class="grid grid-cols-4 gap-0 mx-16">
     
      <Card v-for="card in cards" :key="card" :title="card.title" :image="card.image" :rating="card.rating"/>
  
    </section>
  
    <div class="flex bg-[#4C4556]  w-full items-center justify-center h-44 ">
      <div class="bg-[#4C4556] text-white grid grid-cols-2  items-center justify-center text-3xl gap-10 mb-4 mr-44 " >
        <a  style="font-family: 'Cabin', sans-serif;" class=" text-xl" href="">About Us</a>
        <a  style="font-family: 'Cabin', sans-serif;" class=" text-xl" href="">Cookies</a>
        <a  style="font-family: 'Cabin', sans-serif;" class=" text-xl" href="">FAQs</a>
        <a  style="font-family: 'Cabin', sans-serif;" class=" text-xl" href="">Contact Us</a>
      </div>
      
      <div class="flex flex-col w-1/2  " > 
        <div class=" flex flex-row  space-x-12 self-center" >
        
          <object data="./src/assets/images/fb-logo.svg" type="image/svg+xml"></object>
          <object data="./src/assets/images/ig-logo.svg" type="image/svg+xml"></object>
          <object data="./src/assets/images/tw-logo.svg" type="image/svg+xml"></object>
          
        </div>
        
        
          <!-- <div class=" text-white space-x-6 text-sm  flex items-center" >
            <a href="">© Vipapanna 2023</a>
            <a href="">Vseobecne zmluvne podmienky</a>
            <a href="">Zasady ochrany osobnych udajov</a>
          </div> -->
      

      </div>
    </div>

    <!-- <Location/> -->
>>>>>>> Stashed changes

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
        odoslat
      </button>
    </div>
  </section>

<<<<<<< Updated upstream
  <section class="flex overflow-auto scrollbar-hide">
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
  </section>
=======
  <!-- <router-link to="/"> Home </router-link>
  <router-link to="/RestaurantPage"> restaurant </router-link> -->
>>>>>>> Stashed changes

  <section class="grid grid-cols-4 gap-0 mx-16">
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
    <Card />
  </section>

  <section class="bg-[#4C4556] flex  h-60 ">
    <div class="grid grid-cols-2  gap-4 h-36 self-center ml-10 ">
      <button class="text-white m-0 text-xl text-left  font-sans-serif">Cookies</button>
      <button class="text-white m-0 text-xl text-left">About us</button>
      <button class="text-white m-0 text-xl text-left">FAQs</button>
      <button class="text-white m-0 text-xl text-left ">Contact us</button>
    </div>
  </section>
</template>

<script >
window.addEventListener("DOMContentLoaded", () => {
  const login = document.querySelector("#login");
  const overlay = document.querySelector("#overlay");
  const backbtn = document.querySelector("#back-btn");
  const register = document.querySelector("#create-account");
  const regpage = document.querySelector("#register-page");
  const loginp = document.querySelector("#login-page");
  const resetbtn = document.querySelector("#forgotten-password");
  const resetpasspage = document.querySelector("#reset-password-page");

  login.addEventListener("click", () => {
    overlay.classList.remove("hidden");
    overlay.classList.add("flex");
  });
  backbtn.addEventListener("click", () => {
    overlay.classList.remove("flex");
    overlay.classList.add("hidden");
  });

  register.addEventListener("click", () => {
    loginp.classList.remove("flex");
    loginp.classList.add("hidden");
    regpage.classList.remove("hidden");
    regpage.classList.add("flex");
  });

  resetbtn.addEventListener("click", () => {
    loginp.classList.remove("flex");
    loginp.classList.add("hidden");
    resetpasspage.classList.remove("hidden");
    resetpasspage.classList.add("flex");
  });
});

import Searchbar from "./Searchbar.vue";
import Backbtn from "./Backbtn.vue";
import Card from "./Card.vue";

export default {
  components: { Searchbar, Backbtn, Card },
};
</script>

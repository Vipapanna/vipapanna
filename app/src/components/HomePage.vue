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

<script>
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

<template>
    <section class="bg-[#4C4556] flex h-20 justify-between">  

      <div class="h-100 w-100">
        <router-link to="/">
        <img  src="src/assets/images/vipapanna1.svg" alt="" class="mt-3 ml-3">
        </router-link>
      </div>

      <Searchbar/>

      <button
        class="w-24 h-12 rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90 cursor-pointer"
        @click="popup"
      >
        Log In
      </button>

    </section>
  <section style="font-family: 'Cabin', sans-serif;" >
    <div class=" text-white bg-[url('/src/assets/images/reštauracia.png')]" >
      
      
      <div  class=" flex flex-col pl-10 pt-14 pb-20 " >
        <h1 class=" text-6xl " >McDonalds</h1>
        <h2 class="text-2xl" >RATING</h2>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-10 mx-9 items-center" >
      

      <div class="justify-center items-center flex mb-8" >
        <div class="flex flex-row border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>

      <div class="justify-center items-center flex mb-8 self-center" >
        <div class="flex flex-row  border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>

      <div class="justify-center items-center flex mb-8 " >
      <div class="flex flex-row  border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>

      <div class="justify-center items-center flex mb-8" >
        <div class="flex flex-row  border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>

      <div class="justify-center items-center flex mb-8" >
        <div class="flex flex-row  border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>

      <div class="justify-center items-center flex mb-8" >
        <div class="flex flex-row  border-gray-300 border-2 items-center w-[50rem] rounded-xl " >
          <h3 class="text-3xl mx-auto text-gray-400" >Big Mac Bacon</h3>
          <img class="ml-auto h-[9rem]" src="/src/assets/images/big-mac.png" alt="">
        </div>
      </div>






    </div>
  </section>





    <Footer/>

    
        
        
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
export default{
    
    components: { Searchbar, Footer, }
} 
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');
</style>

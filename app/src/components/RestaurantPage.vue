<template>
    <section class="bg-[#4C4556] flex h-20 justify-between">  
          <router-link to="/"> 

      <object
        data="./src/assets/images/vipapanna1.svg"
        type="image/svg+xml"
        class="m-4"
      ></object>
            </router-link>

      <Searchbar/>

      <button
        class="w-24 h-12 rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90 cursor-pointer"
        @click="popup"
      >
        Log In
      </button>

    </section>

    <div class="bg-[url('src/assets/images/reštauracia.png')] text-white" >
      <h1 class=" text-6xl ml-5 mt-8" >McDonalds</h1>
      
    </div>

    <Footer/>

    
        
        
</template>

<script>
import Searchbar from "./Searchbar.vue";
import Footer from "./Footer.vue";
export default{
    
    components: { Searchbar, Footer, }
} 
</script>

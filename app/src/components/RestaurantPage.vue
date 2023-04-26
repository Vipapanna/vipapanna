<template>
  <section class="bg-[#4C4556] flex h-20 justify-between">  
      <div class=""  @click="goToHomePage">
      <object
        data="./src/assets/images/vipapanna1.svg"
        type="image/svg+xml"
        class="m-4"
      ></object>
    </div>

      <Searchbar/>

      <button
        class="w-24 h-12 rounded-2xl bg-white bg-opacity-20 drop-shadow-md text-white font-sans self-center mr-4 hover:opacity-90 cursor-pointer"
        @click="popup"
      >
        Log In
      </button>

    </section>

    <div   style="background-image:;" class="rest-image w-full" >


    </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        <object
        data="./src/assets/images/vipapanna1.svg"
        type="image/svg+xml"
        class="m-4"
      ></object>
</template>

<script>
import Searchbar from "./Searchbar.vue";

components: { Searchbar };
export default{ components:{Searchbar}}

</script>
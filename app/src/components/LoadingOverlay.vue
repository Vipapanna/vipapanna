<template>
  <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-70 flex justify-center items-center z-50">
    <div class="border-4 border-gray-200 border-t-[#3498db] rounded-full w-12 h-12 animate-spin"></div>
  </div>
</template>

<style>
.animate-spin {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<script>
export default {
  mounted() {
    console.log("picovinaaa");
  },
};
</script>

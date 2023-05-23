<template>
  <div class="items-center flex mb-8 lg:w-[40rem] mx-2">
    <div
      class="flex flex-row border-gray-300 border-2 items-center lg:w-[50rem] rounded-xl"
    >
      <h3 class="lg:text-2xl mx-auto ml-4 text-gray-500 break-all">
        {{ FoodName }}
      </h3>
      <img
        class="ml-auto h-[7rem] lg:h-[9rem] m-2 rounded-2xl"
        :src="FoodImageLink || '/src/assets/images/big-mac.png'"
        alt="placeholder.png"
      />
      <p></p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    FoodName: {
      required: true,
      type: String,
    },
    FoodImageLink: {
      required: true,
      type: String,
    },
  },
};
</script>

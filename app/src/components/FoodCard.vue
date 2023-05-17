<template>
  <div class="justify-center items-center flex mb-8 w-[40rem]">
    <div
      class="flex flex-row border-gray-300 border-2 items-center lg:w-[50rem] rounded-xl"
    >
      <h3 class="lg:text-2xl mx-auto text-gray-500 break-normal">
        {{ FoodName }}
      </h3>
      <img
        class="ml-auto h-[7rem] lg:h-[9rem] m-2 rounded-2xl"
        :src="FoodImageLink"
        alt="placeholder.png"
      />
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

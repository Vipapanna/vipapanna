<template>
  <div class="justify-center items-center flex mb-8 w-[23rem]">
    <div
      class="flex flex-row border-gray-300 border-2 items-center lg:w-[50rem] rounded-xl"
    >
      <h3 class="text-3xl mx-auto text-gray-400">{{ FoodName }}</h3>
      <img
        class="ml-auto h-[7rem] lg:h-[9rem] m-2"
        src="FoodImageLink"
        alt=""
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
      dufault:"kokot",
    },
  }
}
</script>

<template>
  <div class="flex flex-col w-[21rem] m-4 drop-shadow-md hover:drop-shadow-xl">
    <img class="w-[21rem] h-[11rem] rounded-t-2xl" :src="image" alt="" />

    <div class="bg-gray-100 rounded-b-2xl">
      <h1 class="text-2xl mt-2 ml-4">{{ title }}</h1>

      <div class="flex flex-row ml-3 mb-2">
        <img
          v-for="index in star"
          :key="index"
          class="mx-[1px]"
          src="/src/assets/images/rating-star.svg"
          alt=""
        />
        <a class="ml-2 tracking-widest"> {{ rating }}/5</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      require: true,
      type: String,
    },
    image: {
      require: true,
      type: String,
    },
    rating: {
      require: true,
      type: Number,
    },
    star: {
      require: true,
      type: Number,
    },
  },
};
</script>

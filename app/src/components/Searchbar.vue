<template>
  <div class="flex w-full justify-center items-center flex-col">
    <div class="flex justify-center">
      <input
        class="h-10 rounded-3xl w-[20rem] bg-white bg-opacity-20 drop-shadow-md text-center text-white lg:w-[30rem]"
        v-model="search"
        autocomplete="off"
        name="query"
        type="text"
        placeholder="Vypapajte si to..."
      />
    </div>
    <div v-if="search !== ''" class="flex-row">
      <div
        class="bg-[#4C4556] grid grid-cols-4 justify-center items-start mt-4"
      >
        <Card
          class="m-3 cursor-pointer w-[19rem] mb-4"
          @click="selectCard(result)"
          v-for="result in searchResults"
          :key="result"
          :title="result.title"
          :image="result.image"
          :rating="result.rating"
          :star="result.star"
        />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Card from "./Card.vue";

export default {
  components: { Card },

  data() {
    return {
      search: "",
      searchResults: [],
    };
  },
  methods: {
    async performSearch() {
      const res = await axios.get(
        `https://vypapanna.hybridlab.dev/cms/api/v1/restaurant/search?query=${this.search}`
      );
      this.searchResults = res.data.slice(0, 4).map((result) => ({
        title: result.restaurant_name,
        image: result.restaurant_image_link,
        rating: result.review,
        star: Math.floor(result.review),
        address: result.address,
        id: result.id,
      }));
    },
    selectCard(card) {
      this.$store.commit("setSelectedCard", card);
      this.$router.push({
        name: "RestaurantPage",
        params: { refreshKey: Date.now() },
      });
    },
  },
  watch: {
    search: {
      handler: "performSearch",
      immediate: true,
    },
  },
};
</script>

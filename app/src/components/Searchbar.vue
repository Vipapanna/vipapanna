<template>
  <div class="flex flex-col">
    <input
      class="h-10 rounded-3xl w-[20rem] self-center bg-white bg-opacity-20 drop-shadow-md text-center text-white lg:mr-[31rem] lg:w-[30rem]"
      v-model="search"
      autocomplete="off"
      name="query"
      type="text"
      placeholder="Vypapajte si to..."
    />
    <div v-if="search !== ''" class="flex-row">
      <div class="bg-[#4C4556] flex flex-wrap justify-center items-start mt-4">
        <Card
          class="m-auto cursor-pointer w-[calc(25%-1rem)] mb-4"
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

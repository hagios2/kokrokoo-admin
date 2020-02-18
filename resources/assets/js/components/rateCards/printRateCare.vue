<template>
  <div>
    <table class="table table-bordered">
      <thead>
        <tr style="background: #36475F;color: #ffffff;">
          <th>#</th>
          <th class="text-center">Advert size & Positions</th>
          <th class="text-center">Spots</th>
          <th class="text-center">Rate(GHC)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(print,index) in print_segments" :key="index">
          <th scope="row">{{index + 1}}</th>
          <td class="text-center">{{print.sizeAndPosition}}</td>
          <td class="text-center">{{print.spots}}</td>
          <td class="text-center">GHS{{print.rate}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["print_segments"],
  name: "printRateCard",

  mounted() {},
  created() {},
  data() {
    return {};
  },
  methods: {},

  computed: {}
};
</script>


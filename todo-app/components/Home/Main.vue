<template>
    <v-row class="py-2 px-1" justify="start">
      <v-col cols="12" sm="10" md="8">
        <v-chip-group mandatory active-class="primary--text" v-model="selectedChip">
          <v-chip v-for="(chip, index) in chips" :key="index" :value="chip.id">{{ chip.label}}</v-chip>
        </v-chip-group>
        <div>
        <List v-if="selectedChip === 1"/>
        <Completed v-if="selectedChip === 2"/>
        </div>
      </v-col>
    </v-row>
</template>

<script>
import List from "./List";
import Completed from "./Completed";
export default {
name: "main",
  components: {Completed, List},
  data(){
    return {
      selectedChip: 'Pending',
      chips: [
        {id: 1, label: 'Pending'},
        {id: 2, label: 'Completed'},
      ],
    }
  },
  methods: {
    selecChip(value) {
      this.selectedChip = value;
    }
  }
}
</script>

<style scoped>

</style>

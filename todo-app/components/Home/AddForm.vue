<template>
  <v-form @submit.prevent="createTodo">
    <v-row class="align-center">
      <v-col cols="12" md="6">
        <v-flex>
          <v-text-field class="pt-5" v-model="newTodo" label="Add Item here"/>
        </v-flex>
      </v-col>
      <v-col cols="12" md="6">
        <v-btn rounded type="submit" color="primary">Add item</v-btn>
      </v-col>
    </v-row>
  </v-form>
</template>

<script>
export default {
name: "AddForm",
  data() {
    return {
      inputText: ''
    }
  },
  methods: {
    submitForm() {
      // handle form submission here
    }
  }
}
</script>

<style scoped>
.adjust-top{
  margin-top: 20px;
}
</style>

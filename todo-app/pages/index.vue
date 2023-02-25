<template>
  <div>
    <v-container>
      <v-col class="d-flex justify-center">
        <v-card lass="mx-5 my-5 pb-5" max-width="374">
          <v-card-title> Checklist </v-card-title>
          <HomeMain/>
          <HomeAddForm class="margin-left"/>
        </v-card>
      </v-col>
    </v-container>
  </div>
</template>

<style scoped>
.margin-left{
  margin-left: 5%;
}
</style>

<script>
export default {
  name: 'IndexPage',
}
</script>

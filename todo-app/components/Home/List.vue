<template>
        <v-list >
          <v-list-item v-for="item in listItems" :key="item.title">
            <v-checkbox/>
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
</template>

<script>
export default {
  name: "List",
  data() {
    return {
      listItems: [
        { title: 'Item 1' },
        { title: 'Item 2'},
        { title: 'Item 3'}
      ]
    }
  }
}
</script>

<style scoped>

</style>

<template>
        <v-list>
          <v-list-item v-for="items in listItems" :key="items.item">
            <v-checkbox v-model="items.status" @click="updateItems(items.id, items.status)"/>
            <v-list-item-content
              :class="{ 'text-decoration-line-through': items.status }"
              @click="toggleCompleted()"
            >
              <v-list-item-title>{{ items.item }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
</template>

<script>
import Swal from "sweetalert2";

export default {
  name: "List",
  data() {
    return {
      listItems: [],
    }
  },
  methods: {
    getItems(){
      this.$store.dispatch("items/getAllItems")
      .then((res) => {
        this.listItems = res.data;
      })
    },

    toggleCompleted() {
      this.listItems.status = !this.listItems.status;
    },
    updateItems(id, status){
      this.$store.dispatch("items/update", {
        id: id,
        status: status
      })
      .then((res) => {
        Swal.fire({
          title: 'Succesfull',
          text: "Successfully Update Items",
          icon: 'success',
        });
      }).catch((err) => {
        Swal.fire({
          title: 'Hurry',
          text: err,
          icon: 'warning',
        });
      });
    }
  },
  mounted() {
    this.getItems();
  }
}
</script>

<style scoped>
.text-decoration-line-through {
  text-decoration: line-through;
}
</style>

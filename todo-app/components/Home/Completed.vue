<template>
  <v-list>
    <transition-group name="fade" mode="out-in">
      <v-list-item v-for="items in listItems" :key="items.id" v-if="items.status">
        <v-checkbox v-model="items.status" @click="updateItems(items.id, items.status), toggleCompleted(items)"/>
        <v-list-item-content class="strike">
          <v-list-item-title>{{ items.item }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </transition-group>
  </v-list>
</template>

<script>
import Swal from "sweetalert2";

export default {
name: "Completed",
  data() {
    return {
      listItems: [],
    }
  },
  computed: {
    completedItems(){
      return this.listItems.filter(item => !item.status);
    }
  },
  methods: {
    getItems(){
      this.$store.dispatch("items/getAllItems")
        .then((res) => {
          this.listItems = res.data;
        })
    },
    toggleCompleted(item) {
      setTimeout(() => {
        this.items = this.items.filter(i => i.id === item.id)
      }, 2000);
    },
    updateItems(id, status){
      this.$store.dispatch("items/update", {
        id: id,
        status: status
      })
        .then((res) => {
          // Swal.fire({
          //   title: 'Succesfull',
          //   text: "Successfully Update Items",
          //   icon: 'success',
          // });
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
.strike {
  text-decoration: line-through;
}
.line-through-wrapper {
  animation: fadeOut 0.5s ease forwards;
}

.line-through-wrapper .v-list-item-content {
  text-decoration: line-through;
}

@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>

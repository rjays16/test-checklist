<template>
  <v-form>
    <hr>
    <v-row class="align-center adjust-top">
      <v-col cols="12" md="6">
        <v-flex>
          <v-text-field
            class="pt-5"
            v-model="form.inputText"
            :rules="[v => !!v || 'Field is required']"
            label="Add Item here"/>
        </v-flex>
      </v-col>
      <v-col cols="12" md="6">
        <v-btn rounded type="button" color="primary" @click="submitForm">Add item</v-btn>
      </v-col>
    </v-row>
  </v-form>
</template>

<script>
import Swal from 'sweetalert2';
import { mapGetters,  mapActions} from 'vuex'
export default {
name: "AddForm",
  data() {
    return {
      form: {
        inputText: "",
      }
    }
  },
  methods: {
      submitForm(){
        if(this.form.inputText != "") {
          this.$store.dispatch("items/createItem", this.form.inputText)
            .then((res) => {
              Swal.fire({
                title: 'Succesfull',
                text: "Successfully Added Items",
                icon: 'success',
              });
              setTimeout(() => {
                window.location.reload()
              }, 3000);
            }).catch(err => {
            Swal.fire({
              title: 'Hurry',
              text: err,
              icon: 'warning',
            });
          })
        } else {
          Swal.fire({
            title: 'Empty',
            text: "The text field is empty",
            icon: 'warning',
          });
        }
      },
    },

  getItems(){

  }
}
</script>

<style scoped>
.adjust-top{
  margin-top: 5%;
}
</style>

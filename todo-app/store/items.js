import axios from "axios";
// export const state = () => ({
//
// });
//
// export const getters = () => ({
//
// });
//
// export const mutations = () => ({
//
// });
//
// export const actions = () => ({
//   createItem({}, data) {
//     return new Promise((resolve, reject) => {
//       this.axios.post(`${process.env.BASE_URL}items`, data)
//         .then(res => {
//           resolve(res)
//         })
//         .catch(err => {
//           // reject(err.response.data.message)
//           reject("Please Check the Error");
//         })
//     })
//   },
// });
const state = {
  items: [],
};

const mutations = {
  createItems(state, newItem) {
    state.items.push(newItem);
  },
};

export const actions = {
  createItem({}, payload) {
    return new Promise((resolve, reject) => {
      axios.post(`${process.env.BASE_URL}items`, payload)
        .then((response) => {
          // Handle success case
          console.log(response.data)
          resolve(response.data);
        })
        .catch((error) => {
          // Handle error case
          reject(error);
        });
    });
  },
};

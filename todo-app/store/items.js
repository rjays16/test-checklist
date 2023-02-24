import axios from "axios";
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
      axios.post(`${process.env.BASE_URL}items`, {
          item: payload
      })
        .then((response) => {
          resolve(response.data);
        })
        .catch((error) => {
          reject(error);
        });
    });
  },

  getAllItems(){
    return new Promise((resolve, reject) => {
      axios.get(`${process.env.BASE_URL}items`)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },

  update({}, data) {
    return new Promise((resolve, reject) => {
      axios.put(`${process.env.BASE_URL}items/${data['id']}`, data)
        .then(res => {
          resolve(res)
        })
        .catch(err => {
          reject(err.response.data.message)
        })
    })
  },
};



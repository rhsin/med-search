import axios from 'axios';

export const FETCH_MEDS = 'FETCH_MEDS';

const url = 'http://localhost:8000/';

export function fetchMeds() {
    return function(dispatch) {
        axios.get(url + 'meds')
        .then(res => dispatch({
            type: FETCH_MEDS,
            meds: res.data.data
        }))
        .catch(err => {
            console.log(err);
        });
    };
}

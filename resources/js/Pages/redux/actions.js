import axios from 'axios';

export const FETCH_MEDS = 'FETCH_MEDS';

const url = 'http://localhost:8000/';

export function fetchMeds(med) {
    return function(dispatch) {
        axios.get(url + 'search/' + med)
        .then(res => dispatch({
            type: FETCH_MEDS,
            meds: res.data
        }))
        .catch(err => {
            console.log(err);
        });
    };
}

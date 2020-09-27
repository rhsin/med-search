import axios from 'axios';

export const FETCH_MEDS = 'FETCH_MEDS';
export const FETCH_MEDS_ERROR = 'FETCH_MEDS_ERROR';

const url = 'http://localhost:8000/';

export function fetchMeds(med) {
    return dispatch => {
        axios.get(url + 'search/' + med)
        .then(res => dispatch({
            type: FETCH_MEDS,
            meds: res.data.data
        }))
        .catch(err => dispatch({
            type: FETCH_MEDS_ERROR,
            error: err.message
        }));
    };
}

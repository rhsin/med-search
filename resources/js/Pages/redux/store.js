import { createStore, applyMiddleware } from 'redux';
import thunk from 'redux-thunk';

export const initialState = {
    meds: [],
    error: null
};

export function reducer(state = initialState, action) {
    console.log('reducer', state, action);

    switch(action.type) {
        case 'FETCH_MEDS':
            return {
                ...state,
                meds: action.meds
            };
        case 'FETCH_MEDS_ERROR':
            return {
                ...state,
                error: action.error
            };
        default:
            return state;
    }
}

const store = createStore(
    reducer,
    applyMiddleware(thunk)
);

export default store;
  

  
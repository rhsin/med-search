const { TestScheduler } =  require('jest');

const initialState = {
    meds: []
};

function reducer(state = initialState, action) {
    console.log('reducer', state, action);

    switch(action.type) {
        case 'FETCH_MEDS':
            return {
                ...state,
                meds: action.meds
            };
        default:
            return state;
    }
}

const payload = [
    {id: 1, name: 'Acetamenophen'},
    {id: 2, name: 'Ibuprofen'}
]

describe('reducer', () => {
    test('return initial state', () => {
        expect(reducer(undefined, {})).toEqual(initialState);
    });

    test('handle FETCH_MEDS', () => {
        expect(reducer({}, {type: 'FETCH_MEDS', meds: payload}))
            .toEqual({meds: payload});
    });
});
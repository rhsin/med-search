import { TestScheduler } from 'jest';
import { initialState, reducer } from '../Pages/redux/store';

const meds = [
    {id: 1, name: 'Acetamenophen'},
    {id: 2, name: 'Ibuprofen'}
]

const error = 'Not Authorized';

describe('reducer', () => {
    test('return initial state', () => {
        expect(reducer(undefined, {})).toEqual(initialState);
    });

    test('handle FETCH_MEDS', () => {
        expect(reducer({}, {type: 'FETCH_MEDS', meds: meds}))
            .toEqual({meds: meds});
    });

    test('handle FETCH_MEDS_ERROR', () => {
        expect(reducer({}, {type: 'FETCH_MEDS_ERROR', error: error}))
            .toEqual({error: error});
    });
});
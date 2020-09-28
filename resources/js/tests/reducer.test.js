import { TestScheduler } from 'jest';
import { initialState, reducer } from '../Pages/redux/store';

const meds = [
    {id: 1, name: 'Acetamenophen', price: 150},
    {id: 2, name: 'Ibuprofen', price: 250}
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
    
    test('handle FETCH_FIRST_MED', () => {
        expect(reducer({}, {type: 'FETCH_FIRST_MED', meds: meds}))
            .toEqual({meds: meds});
    });

    test('handle FETCH_MEDS_ERROR', () => {
        expect(reducer({}, {type: 'FETCH_MEDS_ERROR', error: error}))
            .toEqual({error: error});
    });

    test('handle SORT_MEDS', () => {
        expect(reducer({meds: meds}, {type: 'SORT_MEDS'}))
            .toEqual({meds: [
                {id: 2, name: 'Ibuprofen', price: 250},
                {id: 1, name: 'Acetamenophen', price: 150}
            ]});
    });

    test('handle FILTER_MEDS', () => {
        expect(reducer({meds: meds}, {type: 'FILTER_MEDS'}))
            .toEqual({meds: [
                {id: 1, name: 'Acetamenophen', price: 150}
            ]});
    });
});
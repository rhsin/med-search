import { TestScheduler } from 'jest';
import axios from 'axios';
import configureStore from 'redux-mock-store';
import thunk from 'redux-thunk';
import { fetchMeds } from '../Pages/redux/actions';

jest.mock('axios');

const mockStore = configureStore([thunk]);

const meds = {
    data: [
        {id: 1, name: 'Acetamenophen'},
        {id: 2, name: 'Ibuprofen'}
    ]
};

const err = {message: 'Not Authorized'};

test('should execute fetch meds', () => {
    const store = mockStore({});
    axios.get.mockResolvedValue(meds);
    const expectedActions = [
        {type: 'FETCH_MEDS', meds: meds.data},
        {type: 'FETCH_MEDS_ERROR', error: err.message}
    ];
    store.dispatch(fetchMeds('meds'));
    const actions = store.getActions();
    store.subscribe(()=> {
        expect(actions).toEqual(expectedActions);
        done();
    });
});
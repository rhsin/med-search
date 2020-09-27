import React from 'react';
import { Provider } from 'react-redux';
import store from './redux/store';
import MedForm from './MedForm';

function MedSearch(props) {
    return (
        <Provider store={store}>
            <MedForm />
        </Provider>
    );
}

export default MedSearch;
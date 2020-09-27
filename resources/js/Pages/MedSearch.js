import React from 'react';
import { Provider } from 'react-redux';
import store from './redux/store';
import MedForm from './MedForm';

function MedSearch({ user }) {
    return (
        <Provider store={store}>
            <MedForm user={user} />
        </Provider>
    );
}

export default MedSearch;
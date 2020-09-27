import React, { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchMeds } from './redux/actions';

function MedForm({ user }) {
    const [search, setSearch] = useState('search');

    const dispatch = useDispatch();
    const meds = useSelector(state => state.meds);

    return (
        <>
            <div>MedForm</div>
            <div>{user.email}</div>
            <div>{meds && meds}</div>
            <input type='text' onChange={e => setSearch(e.target.value)} />
            <button onClick={()=> dispatch(fetchMeds(search))}>
                Fetch Meds
            </button>
        </>
    );
}

export default MedForm;
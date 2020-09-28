import React, { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchMeds } from './redux/actions';

function MedForm({ user }) {
    const [search, setSearch] = useState('search');

    const dispatch = useDispatch();
    const meds = useSelector(state => state.meds);
    const error = useSelector(state => state.error);

    return (
        <>
            <div>MedForm</div>
            <div>{user && user.email}</div>
            <input type='text' onChange={e => setSearch(e.target.value)} />
            <button onClick={()=> dispatch(fetchMeds(search))}>
                Fetch Meds
            </button>
            <div>Results: {meds.length}</div>
            {error && <div>{error}</div>}
            {meds.map(item => 
                <div key={item.id}>
                    {item.name}, {item.package}: ${item.price}
                </div>    
            )}
        </>
    );
}

export default MedForm;
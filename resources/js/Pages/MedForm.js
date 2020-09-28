import React, { useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { fetchMeds, fetchFirstMed, sortMeds, filterMeds } from './redux/actions';

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
            <button onClick={()=> dispatch(fetchFirstMed(search))}>
                Fetch First Med
            </button>
            <div>
                <button onClick={()=> dispatch(sortMeds())}>
                    Sort Meds
                </button>
                <button onClick={()=> dispatch(filterMeds())}>
                    Filter Meds
                </button>
            </div>
            <div>Results: {meds.length}</div>
            {error && <div>{error}</div>}
            <ul>
                {meds.map(item => 
                    <li key={item.id}>
                        {item.name}, {item.package}: ${item.price}
                    </li>    
                )}
            </ul>
        </>
    );
}

export default MedForm;
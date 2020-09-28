import React, { useState } from 'react'
import axios from 'axios';

function MedFormTest({ user }) {
    const [search, setSearch] = useState('search');
    const [meds, setMeds] = useState([]);
    const [error, setError] = useState(null);

    const url = 'http://localhost:8000/';

    const fetchMeds = (med) => {
        axios.get(url + 'search/' + med)
        .then(res => setMeds(res.data))
        .catch(err => setError(err.message))
    };

    return (
        <>
            <div>MedForm</div>
            <div>{user && user.email}</div>
            <input type='text' onChange={e => setSearch(e.target.value)} />
            <button onClick={()=> fetchMeds(search)}>
                Fetch Meds
            </button>
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

export default MedFormTest;
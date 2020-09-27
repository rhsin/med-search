import React from 'react'
import { render, screen } from '@testing-library/react'
import MedSearch from '../Pages/MedSearch';

describe('MedSearch', () => {
    test('renders MedSearch Component', () => {
        render(<MedSearch />);
        screen.debug();
    });
});
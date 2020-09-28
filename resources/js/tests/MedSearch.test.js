import React from 'react'
import { render, screen, fireEvent } from '@testing-library/react'
import '@testing-library/jest-dom/extend-expect'
import MedSearch from '../Pages/MedSearch';

describe('MedSearch', () => {
    test('renders MedSearch with results', () => {
        render(<MedSearch />);
        expect(screen.getByText(/Results/)).toBeInTheDocument();
    });

    test('renders MedSearch with button', () => {
        render(<MedSearch />);
        expect(screen.getByRole('button')).toBeInTheDocument();
    });

    test('renders MedSearch with user', async () => {
        const user = {email: 'ryan@test.com'}
        render(<MedSearch user={user}/>);
        expect(await screen.findByText(/@test.com/)).toBeInTheDocument();
    });

    test('renders MedSearch input change', () => {
        render(<MedSearch />);
        expect(screen.queryByText(/Ibuprofen/)).toBeNull();
        fireEvent.change(screen.getByRole('textbox'), {
            target: {value: 'Ibuprofen'}
        });
        expect(screen.getByDisplayValue(/Ibuprofen/)).toBeInTheDocument();
    });
});
import React from 'react'
import '@testing-library/jest-dom/extend-expect'
import { render, screen } from '@testing-library/react'
import userEvent from '@testing-library/user-event';
import MedSearch from '../Pages/MedSearch';

describe('MedSearch', () => {
    test('renders MedSearch with results', () => {
        render(<MedSearch />);
        expect(screen.getByText(/Results/)).toBeInTheDocument();
    });

    test('renders MedSearch with input', () => {
        render(<MedSearch />);
        expect(screen.getByRole('textbox')).toBeInTheDocument();
    });

    test('renders MedSearch with user', async () => {
        const user = {email: 'ryan@test.com'};
        render(<MedSearch user={user}/>);
        expect(await screen.findByText(/@test.com/)).toBeInTheDocument();
    });

    test('user text input changes display', async () => {
        render(<MedSearch />);
        expect(screen.queryByText(/Ibuprofen/)).toBeNull();
        await userEvent.type(screen.getByRole('textbox'), 'Ibuprofen');
        expect(screen.getByDisplayValue(/Ibuprofen/)).toBeInTheDocument();
    });
});
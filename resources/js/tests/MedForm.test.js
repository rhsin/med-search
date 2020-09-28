import React from 'react'
import '@testing-library/jest-dom/extend-expect'
import { render, screen, act } from '@testing-library/react'
import userEvent from '@testing-library/user-event';
import axios from 'axios';
import MedFormTest from './MedFormTest';

jest.mock('axios');

const meds = {
    data: [
        {id: 1, name: 'Acetamenophen'},
        {id: 2, name: 'Ibuprofen'}
    ]
};

const user = {email: 'ryan@test.com'};

const error = {message: 'Request failed'}

describe('MedSearch', () => {
    test('fetches meds from DB and displays results', async () => {
        axios.get.mockImplementationOnce(() => Promise.resolve(meds));
        render(
            <MedFormTest user={user} />
        );
        await userEvent.type(screen.getByRole('textbox'), 'Ibuprofen');
        await userEvent.click(screen.getByRole('button'));
        const items = await screen.findAllByRole('listitem');
        expect(items.length).toEqual(2);
        await act(() => Promise.resolve(meds));
    });

    test('fetches meds from DB and fails', async () => {
        axios.get.mockImplementationOnce(() => Promise.reject(error));
        render(
            <MedFormTest user={user} />
        );
        await userEvent.type(screen.getByRole('textbox'), 'Ibuprofen');
        await userEvent.click(screen.getByRole('button'));
        const message = await screen.findByText(/Request failed/);
        expect(message).toBeInTheDocument();
      });
});
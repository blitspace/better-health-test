import React from "react";
import { useState } from "react";
import { DataContext } from "./DataContext";


function DataContextProvider({ children }) {
    const [data, setData] = useState(
        [...window.bh.data]
    );

    const [activeCat, setActiveCat] = useState('all');

    const [textFilter, setTextFilter] = useState('');

    const updateData = (newData) => {
        setData(newData);
    };

    const updateActiveCat = (newActiveCat) => {
        setActiveCat(newActiveCat);
    };

    const updateTextFilter = (newTextFilter) => {
        setTextFilter(newTextFilter);
    };

    return (
        <DataContext.Provider value={{
            activeCat,
            updateActiveCat,
            textFilter,
            updateTextFilter,
            data,
            updateData
        }}>
            {children}
        </DataContext.Provider>
    );
}

export default DataContextProvider;

import React from "react";
import { useState } from "react";
import { DataContext } from "./DataContext";


function DataContextProvider({ children }) {
    const [data, setData] = useState(
        [...window.bh.data]
    );

    const [activeCat, setActiveCat] = useState(
        'all'
    );

    const updateData = (newData) => {
        setData(newData);
    };

    const updateActiveCat = (newActiveCat) => {
        setActiveCat(newActiveCat);
    };

    return (
        <DataContext.Provider value={{
            activeCat,
            updateActiveCat,
            data,
            updateData
        }}>
            {children}
        </DataContext.Provider>
    );
}

export default DataContextProvider;

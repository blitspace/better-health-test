import React from "react";
import { useState } from "react";
import { DataContext } from "./DataContext";


function DataContextProvider({ children }) {
    const [data, setData] = useState(
        [...window.bh.data]
    );

    const updateData = (newData) => {
        setData(newData);
    };


    return (
        <DataContext.Provider value={{
            data,
            updateData
        }}>
            {children}
        </DataContext.Provider>
    );
}

export default DataContextProvider;

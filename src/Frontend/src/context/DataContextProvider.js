import React from "react";
import { useState } from "react";
import { DataContext } from "./DataContext";


function DataContextProvider({ children }) {
    const [data, setData] = useState(
        [...window.bh.data]
    );

    const [technologyOptions] = useState(
        [...window.bh.technologyOptions]
    );

    const [subTechnologyOptions] = useState(
        [...window.bh.subTechnologyOptions]
    );

    const [vendorOptions] = useState(
        [...window.bh.vendorOptions]
    );

    const [productTypeOptions] = useState(
        [...window.bh.productTypeOptions]
    );

    const [activeCat, setActiveCat] = useState('all');
    const [activeTechnologyFilter, setActiveTechnologyFilter] = useState(null);
    const [activeSubTechnologyFilter, setActiveSubTechnologyFilter] = useState(null);
    const [activeVendorFilter, setActiveVendorFilter] = useState(null);
    const [activeProductTypeFilter, setActiveProductTypeFilter] = useState(null);

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

    const updateTechnologyFilter = (newTechnologyFilter) => {
        setActiveTechnologyFilter(newTechnologyFilter);
    };

    const updateSubTechnologyFilter = (newSubTechnologyFilter) => {
        setActiveSubTechnologyFilter(newSubTechnologyFilter);
    };  

    const updateVendorFilter = (newVendorFilter) => {
        setActiveVendorFilter(newVendorFilter);
    };

    const updateProductTypeFilter = (newProductTypeFilter) => {
        setActiveProductTypeFilter(newProductTypeFilter);
    };

    return (
        <DataContext.Provider value={{
            activeCat,
            updateActiveCat,
            textFilter,
            updateTextFilter,
            data,
            updateData,

            technologyOptions,
            subTechnologyOptions,
            vendorOptions,
            productTypeOptions,

            activeTechnologyFilter,
            updateTechnologyFilter,

            activeSubTechnologyFilter,
            updateSubTechnologyFilter,

            activeVendorFilter,
            updateVendorFilter,

            activeProductTypeFilter,
            updateProductTypeFilter,
        }}>
            {children}
        </DataContext.Provider>
    );
}

export default DataContextProvider;

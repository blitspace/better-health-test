import React from 'react';
import CatNav from './CatNav';
import Browser from './Browser';
import DataContextProvider from './context/DataContextProvider';


const App = () => {
    return (
        <DataContextProvider>
            <div className='tw'>
                <div className="bg-gray-100/50 p-8 mb-8">
                    <div className="flex flex-row gap-10">
                        <div className="basis-[300px]">
                            <CatNav activeIndx={0} />
                        </div>
                        <div className="flex-grow">
                            <Browser
                                title="Life Cycle Services"
                                description="Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                            />
                        </div>
                    </div>
                </div>
            </div>
        </DataContextProvider>
    );
};

export default App;

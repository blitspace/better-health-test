import React from 'react';
import CatNav from './CatNav';
import Browser from './Browser';

const App = () => {
    return (
        <div className='tw'>

        <div className="bg-gray-100 p-8 mb-8">
            <div className="flex flex-row gap-10">
                <div className="basis-[300px]">
                    <CatNav activeIndx={0} />
                </div>
                <div className="flex-grow">
                    <Browser />
                </div>
            </div>
        </div>

        </div>
    );
};

export default App;
